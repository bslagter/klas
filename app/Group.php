<?php
declare(strict_types=1);

namespace bslagter\klas\app;

final class Group
{
    /** @var string */
    private $name;
    /** @var Student[] */
    private $students = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addStudent(Student $student): self
    {
        $this->students[] = $student;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Student[]
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    public function assignSegmentToSingles(int $nrSegments): void
    {
        $counts = array_fill_keys(range(0, $nrSegments - 1), 0);

        foreach ($this->students as $student) {
            if (!$student->hasSegment()) {
                continue;
            }
            $counts[$student->getSegment()]++;
        }

        foreach ($this->students as $student) {

            if ($student->hasSegment()) {
                continue;
            }
            asort($counts);
            reset($counts);
            $nextSegment = key($counts);
            $student->setSegment($nextSegment);
            $counts[$nextSegment]++;
        }
    }
}
