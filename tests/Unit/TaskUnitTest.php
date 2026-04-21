<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_has_fillable_attributes(): void
    {
        $task = new Task();
        $this->assertEquals(['title', 'description', 'completed'], $task->getFillable());
    }

    public function test_task_can_be_created_with_attributes(): void
    {
        $task = Task::create([
            'title' => 'Teste unitário',
            'description' => 'Descrição do teste',
            'completed' => false,
        ]);

        $this->assertDatabaseHas('tasks', ['title' => 'Teste unitário']);
    }

    public function test_task_completed_defaults_to_false(): void
    {
        $task = Task::create(['title' => 'Task padrão']);

        $this->assertFalse((bool) $task->completed);
    }

    public function test_task_can_be_marked_as_completed(): void
    {
        $task = Task::create(['title' => 'Task para completar']);
        $task->update(['completed' => true]);

        $this->assertTrue((bool) $task->fresh()->completed);
    }

    public function test_task_can_be_deleted(): void
    {
        $task = Task::create(['title' => 'Task para deletar']);
        $id = $task->id;
        $task->delete();

        $this->assertDatabaseMissing('tasks', ['id' => $id]);
    }
}