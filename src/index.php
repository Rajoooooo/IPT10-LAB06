<?php
require "../vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('ipt10');

$handler = new StreamHandler('ipt10.log');
$log->pushHandler($handler);

$log->warning('Rafael John L. Castro');
$log->error('castro.rafaeljohn@auf.edu.ph');
$log->info('profile', [
    'student_number' => '22-0798-586',
    'college' => 'College of Computer Studies',
    'program' => 'Information Technology',
    'university' => 'Angeles University Foundation'
]);

class TestClass
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function greet($name)
    {
        $message = "Greetings to {$name}";
        $this->logger->info(__METHOD__ . ": " . $message);
        return "Hello, {$name}";
    }

    public function getAverage($data)
    {
        if (empty($data)) {
            $this->logger->info(__CLASS__ . " Computing the average with no data.");
            return null;
        }
        $average = array_sum($data) / count($data);
        $this->logger->info(__CLASS__ . " Computed average: {$average}");
        return $average;
    }

    public function largest($data)
    {
        if (empty($data)) {
            $this->logger->info(__CLASS__ . " Finding the largest number with no data.");
            return null;
        }
        $largest = max($data);
        $this->logger->info(__CLASS__ . " Largest number found: {$largest}");
        return $largest;
    }

    public function smallest($data)
    {
        if (empty($data)) {
            $this->logger->info(__CLASS__ . " Finding the smallest number with no data.");
            return null;
        }
        $smallest = min($data);
        $this->logger->info(__CLASS__ . " Smallest number found: {$smallest}");
        return $smallest;
    }
}

$my_name = 'Rafael John L. Castro';

$obj = new TestClass($log);
echo $obj->greet($my_name);

$data = [100, 345, 4563, 65, 234, 6734, -99];

$log->info('Data', ['data' => $data]);
$average = $obj->getAverage($data);
$largest = $obj->largest($data);
$smallest = $obj->smallest($data);
