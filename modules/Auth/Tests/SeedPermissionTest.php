<?php

//use Illuminate\Foundation\Testing\WithoutMiddleware;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Auth\Traits\SeedPermissions;

class SeedPermissionTest extends TestCase
{
    use DatabaseTransactions, SeedPermissions;

    /**
     * @test
     */
    public function it_format_two_words_to_word_slug_word()
    {
        $action = 'create';
        $model = 'user';

        $result = $this->formatToSlug($action, $model);

        $output = 'create-user';

        $this->assertEquals($output, $result);
    }

    /**
     * @test
     */
    public function it_format_first_letter_to_camel_case()
    {
        $action = 'create';
        $model = 'user';

        $result = $this->formatToCamelCase($action, $model);

        $output = 'Create User';

        $this->assertEquals($output, $result);
    }
}
