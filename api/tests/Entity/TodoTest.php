<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Todo;

class TodoTest extends TestCase
{
    public function testGetId(): void
    {
        $todo = new Todo();
        $this->assertNull($todo->getId());

        $todo->setId('123');
        $this->assertEquals('123', $todo->getId());
    }

    public function testGetSetTitle(): void
    {
        $todo = new Todo();
        $this->assertNull($todo->getTitle());

        $todo->setTitle('Test Todo');
        $this->assertEquals('Test Todo', $todo->getTitle());
    }

    public function testIsSetCompleted(): void
    {
        $todo = new Todo();
        $this->assertFalse($todo->isCompleted());

        $todo->setCompleted(true);
        $this->assertTrue($todo->isCompleted());
    }
}
