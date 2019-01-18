<?php

namespace AppBundle\Command;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends ContainerAwareCommand {

    private $passwordEncoder;

    /**
     * CreateUserCommand constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;

        parent::__construct();
    }


    /**
     * {@inheritdoc}
     */
    protected function configure() {
        $this
            ->setName('app:create:user')
            ->setDescription('Hello PhpStorm')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the user.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        $output->writeln('Username: ' . $username);
        $output->writeln('Password: ' . $password);

        if (!$this->passwordEncoder) {
            dump('No password encoder defined!');
            die();
        }

        $user = new User();
        $user
            ->setUsername($username)
            ->setPassword($this->passwordEncoder->encodePassword($user, $password))
            ->setLastLogin(new \DateTime())
            ->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

        $this->getContainer()->get('doctrine.orm.default_entity_manager')->persist($user);
        $this->getContainer()->get('doctrine.orm.default_entity_manager')->flush();

        $output->writeln([
            '============',
            'User: ' . $username . ' created successfully!',
            '============',
            '',
        ]);

    }
}
