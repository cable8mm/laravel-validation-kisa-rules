<?php

namespace Cable8mm\ValidationKisaRules\Tests\Rules;

use Cable8mm\ValidationKisaRules\Rules\KisaPassword;
use Illuminate\Support\Facades\Validator;
use Orchestra\Testbench\TestCase;

class KisaPasswordTest extends TestCase
{
    /**
     * @return array<string, array{0:string,1:bool}>
     */
    public static function passwordProvider(): array
    {
        return [
            // Invalid
            'digits only less than 10 chars' => ['12345678', false],
            'letters only less than 10 chars' => ['abcdefgha', false],
            'special chars only less than 10 chars' => ['!!!!!!!!!', false],
            'more than 20 chars' => ['abcdefghijklmnopqrstu', false],

            // Valid - Condition 1
            'digits only 10 chars' => ['1234567890', true],
            'letters only 10 chars' => ['abcdefghij', true],
            'special chars only 10 chars' => ['!!!!!!!!!!', true],

            // Valid - Condition 2
            'letters and digits' => ['abcd1234', true],
            'letters and symbols' => ['abcd!@#$', true],
            'digits and symbols' => ['1234!@#$', true],
            'letters digits symbols' => ['abcd123!', true],

            // Valid - Max length
            'exactly 20 chars' => ['abcdefghijklmnopqrst', true],
        ];
    }

    /**
     * @dataProvider passwordProvider
     */
    public function test_kisa_password_rule(
        string $password,
        bool $expected,
    ): void {
        $validator = Validator::make(
            ['password' => $password],
            ['password' => [new KisaPassword]]
        );

        $this->assertSame(
            $expected,
            $validator->passes()
        );
    }

    public function test_validation_message(): void
    {
        $validator = Validator::make(
            ['password' => '12345678'],
            ['password' => [new KisaPassword]]
        );

        $this->assertTrue($validator->fails());

        $this->assertSame(
            'The password must follow password rules.',
            $validator->errors()->first()
        );
    }
}
