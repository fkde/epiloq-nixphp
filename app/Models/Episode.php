<?php

namespace App\Models;

use App\Models\Repository\SymptomRepository;
use App\Models\Repository\TriggerRepository;
use App\Models\Repository\TypeRepository;
use NixPHP\ORM\Model\AbstractModel;

class Episode extends AbstractModel
{

    protected Type $type;
    protected int $user_id;
    protected array $triggers = [];
    protected array $symptoms = [];
    protected ?string $note = null;

    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    public function addType(Type $type): void
    {
        $this->type = $type;
    }

    public function addTrigger(Trigger $trigger): void
    {
        $this->triggers[] = $trigger;
    }

    public function addSymptom(Symptom $symptom): void
    {
        $this->symptoms[] = $symptom;
    }

    public function getUser()
    {

    }

    public function getNote():? string
    {
        return $this->note;
    }

    public function getType(): Type
    {
        if (empty($this->type)) {
            $this->type = (new TypeRepository())->findByPivot(Episode::class, $this->id)[0];
        }
        return $this->type;
    }

    public function getTriggers(): array
    {
        if (empty($this->triggers)) {
            $this->triggers = (new TriggerRepository())->findByPivot(Episode::class, $this->id);
        }
        return $this->triggers;
    }

    public function getSymptoms(): array
    {
        if (empty($this->symptoms)) {
            $this->symptoms = (new SymptomRepository())->findByPivot(Episode::class, $this->id);
        }
        return $this->symptoms;
    }

}