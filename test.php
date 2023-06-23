<?php

readonly class Employee {
    public function __construct(
        private string $name, 
        private string $position, 
        private float $salary
    ) {
    }

    public function get_name(): string {
        return $this->name;
    }

    public function get_position(): string {
        return $this->position;
    }

    public function get_salary(): float {
        return $this->salary;
    }

    public function get_employee_info(): string {
        return "{$this->name} is a {$this->position} with a salary of {$this->salary}.";
    }
}

class Company {

    private $employees = [];

    public function add_employee(Employee $employee): self {
        array_push($this->employees, $employee);
    
        return $this;
    }

    public function get_employees(): array {
        return $this->employees;
    }

    public function get_employee_count(): int {
        return count($this->employees);
    }

    public function get_average_salary(): float {
        if ($this->get_employee_count() == 0) {
            return 0;
        }

        $total_salary = 0;

        foreach ($this->employees as $employee) {
            $total_salary += $employee->get_salary();
        }

        return round($total_salary / $this->get_employee_count(), 2);
    }
}