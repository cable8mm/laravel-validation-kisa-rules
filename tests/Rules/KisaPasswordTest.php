<?php

namespace Cable8mm\ValidationKisaRules\Tests\Rules;

use Cable8mm\ValidationKisaRules\Rules\KisaPassword;
use Illuminate\Support\Facades\Validator;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase;

class KisaPasswordTest extends TestCase
{
    use WithWorkbench;

    protected $enablesPackageDiscoveries = true;

    protected function getPackageProviders($app)
    {
        return [
            'Illuminate\Translation\TranslationServiceProvider',
        ];
    }

    public function test_pass_according_to_kisa_password_rule_or_not()
    {
        $passwords = [
            '12345678' => false,
            'abcdefgha' => false,
            // Pass Condition 1
            '12345678232342' => true,
            // Pass Condition 1
            'skdfjoaweijfae' => true,
            // Pass Condition 2
            '12345678a' => true,
            // Pass Condition 2
            '123asd!!' => true,
            'ijiasdfj2@fjdsk' => true,
        ];

        foreach ($passwords as $password => $expected) {
            $input = ['name' => $password];
            $rules = ['name' => new KisaPassword];

            if ($expected) {
                $this->assertTrue(Validator::make($input, $rules)->passes());
            } else {
                $this->assertFalse(Validator::make($input, $rules)->passes());
            }
        }
    }

    public function test_validate_message_can_be_seen()
    {
        $rule = new KisaPassword;

        $input = ['name' => '12345678'];
        $rules = ['name' => new KisaPassword];

        $this->assertSame('The name must follow password rules.', Validator::make($input, $rules)->messages()->first());
    }
}
