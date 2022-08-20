<?php declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\FilenameSanitize;

class FilenameSanitizeTest extends TestCase {
    /**
     * @return array<string, array<string, string>>
     */
    public function filename(): array {
        return [
            'TODO'                           => ['TODO', 'todo'],
            '.github'                        => ['.github', '.github'],
            '.env.test'                      => ['.env.test', '.env.test'],
            '.hiddenFiles'                   => ['.hiddenFiles', '.hiddenfiles'],
            'File NaME.Zip'                  => ['File NaME.Zip',   'file-name.zip'],
            'file   name.zip'                => ['file   name.zip', 'file-name.zip'],
            'file___name.zip'                => ['file___name.zip', 'file-name.zip'],
            'file---name.zip'                => ['file---name.zip', 'file-name.zip'],
            'file...name..zip'               => ['file...name..zip', 'file.name.zip'],
            'file<->\\name/":.zip:'          => ['file<->\\name/":.zip:', 'file-name.zip'],
            '   file  name  .   zip'         => ['   file  name  .   zip', 'file-name.zip'],
            'file--.--.-.--name.zip'         => ['file--.--.-.--name.zip', 'file.name.zip'],
            'file-name|#\[\]&@()+,;=.zip'    => ['file-name|#\[\]&@()+,;=.zip', 'file-name.zip'],
            'js script'                      => ['<script>alert(1);</script>', 'script-alert-1-script'],
            'php function'                   => ['<?php malicious_function(); ?>`rm -rf /`', 'php-malicious-function-rm-rf'],
            'special char 0'                 => ['On / Off Again: My Journey to Stardom.jpg'.chr(0), 'on-off-again-my-journey-to-stardom.jpg'],
            'long filename to max 255 chars' => [
                '123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890.zip',
                '12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901.zip'
            ],
        ];
    }

    /** @dataProvider filename */
    public function test_filename_sanitize(string $input, string $expected): void {
        $output = (new FilenameSanitize())($input);
        // dump($input.' -> '.$output);
        $this->assertSame($expected, $output);
    }

    public function test_filename_sanitize_exception_if_is_using_root_char(): void {
        $this->expectExceptionCode(5);
        (new FilenameSanitize())('.');
    }

    public function test_filename_sanitize_exception_if_is_using_prev_char(): void {
        $this->expectExceptionCode(5);
        (new FilenameSanitize())('..');
    }

    public function test_filename_sanitize_exception_if_is_using_empty_string(): void {
        $this->expectExceptionCode(5);
        (new FilenameSanitize())('');
    }
}
