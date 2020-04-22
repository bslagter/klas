<?php
declare(strict_types=1);

namespace bslagter\klas\app;

final class Address
{
    /** @var string */
    private $address;
    /** @var Student[] */
    private $students = [];

    public function __construct(string $address)
    {
        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getId(): string
    {
        return sha1($this->address);
    }

    public function addStudent(Student $student): self
    {
        $this->students[] = $student;
        return $this;
    }

    /**
     * @return Student[]
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    public function getNumberOfStudents(): int
    {
        return count($this->students);
    }
}
