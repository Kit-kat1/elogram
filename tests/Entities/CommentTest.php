<?php

namespace Elogram\Tests\Entities;

use Elogram\Entities\Comment;
use Elogram\Http\Clients\MockAdapter;
use Elogram\Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * @var Comment
     */
    protected $comment;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $this->comment = new Comment(new MockAdapter($this->getFixturesPath()));
    }

    /**
     * @covers Elogram\Entities\Comment::__construct()
     * @covers Elogram\Entities\Comment::get()
     */
    public function testGet()
    {
        $response = $this->comment->get('420')->get();
        $this->assertCount(1, $response);
    }

    /**
     * @covers Elogram\Entities\Comment::__construct()
     * @covers Elogram\Entities\Comment::create()
     */
    public function testCreate()
    {
        $response = $this->comment->create('315', 'A comment')->get();
        $this->assertNull($response);
    }

    /**
     * @covers Elogram\Entities\Comment::__construct()
     * @covers Elogram\Entities\Comment::delete()
     */
    public function testDelete()
    {
        $response = $this->comment->delete('315', '1')->get();
        $this->assertNull($response);
    }
}
