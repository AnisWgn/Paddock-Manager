<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Crée un utilisateur',
)]
class CreateUserCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher,
        private UserRepository $userRepository,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email de l\'utilisateur')
            ->addArgument('password', InputArgument::REQUIRED, 'Mot de passe')
            ->addOption('admin', null, InputOption::VALUE_NONE, 'Attribuer le rôle ROLE_ADMIN')
            ->addOption('update', null, InputOption::VALUE_NONE, 'Mettre à jour l\'utilisateur existant (mot de passe et rôle)');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');
        $isUpdate = $input->getOption('update');

        $user = $this->userRepository->findOneBy(['email' => $email]);

        if ($user) {
            if (!$isUpdate) {
                $io->error(sprintf('L\'utilisateur %s existe déjà. Utilisez --update pour mettre à jour le mot de passe et le rôle.', $email));
                return Command::FAILURE;
            }
        } else {
            $user = new User();
            $user->setEmail($email);
        }

        $user->setPassword($this->passwordHasher->hashPassword($user, $password));

        if ($input->getOption('admin')) {
            $user->setRoles(['ROLE_ADMIN']);
        } elseif ($user->getId()) {
            $user->setRoles([]);
        }

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success($user->getId() ? sprintf('Utilisateur %s mis à jour.', $email) : sprintf('Utilisateur %s créé.', $email));

        return Command::SUCCESS;
    }
}
