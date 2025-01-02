<?php

namespace App\Traits;

trait EncryptionTrait
{
    public function decryptPassword($encryptedPassword)
    {
        $key = env('AES_KEY');
        $iv = env('AES_IV');

        // Decrypt the password using AES-256-CBC
        return openssl_decrypt(
            base64_decode($encryptedPassword),  // Decode the base64 encoded password
            'AES-256-CBC',
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
    }
}
