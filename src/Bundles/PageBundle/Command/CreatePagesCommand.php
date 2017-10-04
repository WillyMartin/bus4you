<?php

namespace Bundles\PageBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePagesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('page:create')

            // the short description shown while running "php bin/console list"
            ->setDescription('Creates new pages.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("This command allows you to create pages...")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pg = $this->getContainer()->get('bundles.page.page_generator');
        $pg->generate();
    }
}