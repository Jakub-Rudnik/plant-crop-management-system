<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/EmployeeService.php';

$employeesHtml = "";

$employeeService = new EmployeeService();
$employees = $employeeService->getEmployees();

foreach ($employees as $employee) {
    $employeeNames = $employee->forename . " " . $employee->lastname;

    $employeesHtml = $employeesHtml . "
        <div class='card'>
            <h3 class='card__title'>
               $employeeNames 
            </h3>
            <div class='card__body'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='var(--text-800)' width='36' height='36'>
                    <path fill-rule='evenodd' d='M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z' clip-rule='evenodd' />
                </svg>
            </div>
        </div>
    ";
}

echo $employeesHtml;