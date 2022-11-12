<?php

namespace Modules\Core\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Core\Jobs\DecryptStringJob;
use Modules\Core\Jobs\EncryptStringJob;

class EncryptionAndDecryptionTest extends TestCase
{
    private string $message = "This is a secret message to encode";

    // @test */
    public function testEnsureDataCanBeEncrypted()
    {
        $key = base64_decode(config('core.server_key'));
        $nonce = base64_decode(config('core.server_nonce'));

        $encryptedText = sodium_crypto_secretbox($this->message, $nonce, $key);
        $base64EncodedEncryptedText = base64_encode($encryptedText);

        $encryptJob = new EncryptStringJob($this->message);

        $this->assertEquals($base64EncodedEncryptedText, $encryptJob->handle());
    }

    // @test */
    public function testEnsureDataCanBeDecrypted()
    {
        $key = base64_decode(config('core.server_key'));
        $nonce = base64_decode(config('core.server_nonce'));

        $encryptedText = sodium_crypto_secretbox($this->message, $nonce, $key);
        $base64EncodedEncryptedText = base64_encode($encryptedText);

        $decryptJob = new DecryptStringJob($base64EncodedEncryptedText);
        $this->assertEquals($this->message, $decryptJob->handle());
    }
}
