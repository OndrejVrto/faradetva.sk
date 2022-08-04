<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Traits\CanAuthorizeTrait;

abstract class BaseRequest extends FormRequest {
    use CanAuthorizeTrait;

    protected function requireORnullable(): string {
        return $this->getMethod() == 'POST' ? 'required' : 'nullable';
    }

    protected function reqBoolRule(): array {
        return [
            'boolean',
            'required',
        ];
    }

    protected function reqStrRule(int $max = 255): array {
        return [
            'required',
            'string',
            'max:'.$max,
        ];
    }

    protected function nullStrRule(int $max = 255): array {
        return [
            'nullable',
            'string',
            'max:'.$max,
        ];
    }

    protected function nullUrlRule(int $max = 512): array {
        return [
            'nullable',
            'url',
            'string',
            'max:'.$max,
        ];
    }

    public function withValidator(Validator $validator) {
        if ($rulesAndMessages = $this->getTraitRulesAndMessages()) {
            $validator->addRules($rulesAndMessages['rules']);
            $validator->customMessages = array_merge($validator->customMessages, $rulesAndMessages['messages']);
        }
    }

    protected function getTraitRulesAndMessages() {
        return array_reduce(class_uses(static::class), function ($rulesAndMessages, $trait) {
            preg_match('/^Has([A-Za-z]+)Fields$/', class_basename($trait), $matchTraitConvention);

            if ($traitSubject = isset($matchTraitConvention[1]) ? $matchTraitConvention[1] : null) {
                $rulesAndMessages['rules'] = array_merge($rulesAndMessages['rules'], $this->getTraitRules($traitSubject));
                $rulesAndMessages['messages'] = array_merge($rulesAndMessages['messages'], $this->getTraitMessages($traitSubject));
            }

            return $rulesAndMessages;
        }, array_fill_keys(['messages', 'rules'], []));
    }

    protected function getTraitRules($traitSubject) {
        $methodName = Str::camel($traitSubject) . 'Rules';

        return method_exists($this, $methodName) ? $this->{$methodName}() : [];
    }

    protected function getTraitMessages($traitSubject) {
        $methodName = Str::camel($traitSubject) . 'Messages';

        return method_exists($this, $methodName) ? $this->{$methodName}() : [];
    }
}
