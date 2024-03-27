<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailableTest extends TestCase
{
   //assert that there is a file in the mail folder
    public function test_mailable_file_exists(): void
    {
        $this->assertFileExists(app_path('Mail/InvoiceMailer.php'));
    }
  
   
   
}
