<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BlogTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testPageIsUp()
    {
        $this->visit('/blog')
             ->see('Blog');
    }
}
