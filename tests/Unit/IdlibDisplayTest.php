<?php

namespace Tests\Unit;

use App\Log;
use App\Place;
use App\ProjectEnglish;
use App\ProjectFrench;
use App\SuccessEnglish;
use App\SuccessFrench;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class IdlibDisplayTest extends TestCase
{
    public static function displayAttributes(): array
    {
        return [
            [Place::class, 'name'],
            [ProjectEnglish::class, 'MPE_Suffering'],
            [ProjectFrench::class, 'MPE_Suffering'],
            [SuccessEnglish::class, 'text'],
            [SuccessFrench::class, 'text'],
            [Log::class, 'operation'],
            [Log::class, 'previous_data'],
            [Log::class, 'current_data'],
        ];
    }

    #[DataProvider('displayAttributes')]
    public function test_idleb_is_changed_only_when_an_attribute_is_read(string $modelClass, string $attribute): void
    {
        $model = new $modelClass;
        $model->setRawAttributes([$attribute => 'From IDLEB to Idleb'], true);

        $this->assertSame('From IDLEB to Idleb', $model->getRawOriginal($attribute));
        $this->assertSame('From Idlib to Idlib', $model->getAttribute($attribute));
    }
}
