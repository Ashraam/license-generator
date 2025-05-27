<?php

namespace Ashraam\LicenseGenerator;

class LicenseGenerator
{
    private ?string $prefix = null;

    private string $template = 'XXXX-9999-X9X9-99XX';

    private ?string $suffix = null;

    private bool $lowerCase = false;

    /**
     * @param  string|null  $prefix
     * @return $this
     */
    public function prefix(?string $prefix = null): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @param  string|null  $suffix
     * @return $this
     */
    public function suffix(?string $suffix = null): self
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * @param  string  $template
     * @return $this
     */
    public function template(string $template): self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return $this
     */
    public function lowerCase(): self
    {
        $this->lowerCase = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function upperCase(): self
    {
        $this->lowerCase = false;

        return $this;
    }

    /**
     * @param  int  $count
     * @return array|string
     */
    public function generate(int $count = 1)
    {
        if($count > 1) {
            return $this->generateMany($count);
        } else {
            return $this->generateOne();
        }
    }

    /**
     * @return string
     */
    public function generateOne(): string
    {
        return $this->make();
    }

    /**
     * @param  int  $count
     * @return array
     */
    public function generateMany(int $count): array
    {
        $keys = [];

        do {
            $key = $this->make();

            if(in_array($key, $keys, true)) {
                continue;
            }

            $keys[] = $key;
            $count--;
        } while($count > 0);

        return $keys;
    }

    /**
     * @return string
     */
    private function make(): string
    {
        $key = '';

        if($this->prefix) {
            $key .= $this->prefix;
        }

        $char = strlen($this->template);

        for($i = 0; $i < $char; $i++) {
            if(preg_match('/[a-zA-Z]/', $this->template[$i])) {
                if ($this->lowerCase) {
                    $key .= chr(random_int(97, 122));
                } else {
                    $key .= chr(random_int(65, 90));
                }
            } else if(preg_match('/\d/', $this->template[$i])) {
                $key .= random_int(0, 9);
            } else {
                $key .= $this->template[$i];
            }
        }

        if($this->suffix) {
            $key .= $this->suffix;
        }

        return $key;
    }
}
