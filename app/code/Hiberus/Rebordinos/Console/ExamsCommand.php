<?php

namespace Hiberus\Rebordinos\Console;

use Hiberus\Rebordinos\Api\Data\ExamInterfaceFactory;
use Hiberus\Rebordinos\Model\Exam;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class ExamsCommand extends Command
{

    const NAME = 'examenes';

    /**
     * @var Exam
     */
    protected Exam $exam;
    protected $examInterfaceFactory;

    /**
     * @param Exam $exam
     * @param ExamInterfaceFactory $examInterfaceFactory
     */
    public function __construct(
        Exam $exam,
        ExamInterfaceFactory $examInterfaceFactory
    )
    {
        $this->exam = $exam;
        $this->examInterfaceFactory = $examInterfaceFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('hiberus:rebordinos')
            ->setDescription('Muestra los datos de la tabla de examenes');

        parent::configure();
    }

      /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $resultPage = $this->examInterfaceFactory->create();
        $exams = $resultPage->getCollection();

        foreach ($exams as $item){
            $this->exam->setEntityId($item->getEntityId());
            $this->exam->setFirstname($item->getFirstname());
            $this->exam->setLastname($item->getLastname());
            $this->exam->setMark($item->getMark());
            $output->writeln('<info> ID: ' . $this->exam->getEntityId() .
                ' | First name: ' . $this->exam->getFirstname() .
                ' | Last name: ' . $this->exam->getLastname() .
                ' | Mark: ' . $this->exam->getMark() . '</info>');
        }
    }

}
