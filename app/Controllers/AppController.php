<?php

namespace App\Controllers;

use App\Models\Episode;
use App\Models\Repository\SymptomRepository;
use App\Models\Repository\TriggerRepository;
use App\Models\Repository\TypeRepository;
use Nyholm\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use function NixPHP\Form\validator;
use function NixPHP\ORM\em;
use function NixPHP\ORM\repo;
use function NixPHP\param;
use function NixPHP\redirect;
use function NixPHP\request;
use function NixPHP\route;
use function NixPHP\View\render;

class AppController
{

    public function index(): ResponseInterface
    {
        $types = repo(TypeRepository::class)->findAll();
        $triggers = repo(TriggerRepository::class)->findAll();
        $symptoms = repo(SymptomRepository::class)->findAll();
        $data = ['types' => $types, 'triggers' => $triggers, 'symptoms' => $symptoms];

        $validator = validator(param()->all(), [
            'types'    => 'required',
            'symptoms' => 'required',
            'triggers' => 'required',
            'duration' => 'required',
            'note'     => 'string',
        ]);

        if (false === $validator->fails()) {
            return $this->store();
        }

        return render('index', ['data' => $data, 'validator' => $validator]);
    }

    protected function store(): ResponseInterface
    {
        $types = $this->normalizeCommaInput(param()->get('types'));
        $symptoms = $this->normalizeCommaInput(param()->get('symptoms'));
        $triggers = $this->normalizeCommaInput(param()->get('triggers'));

        $typeList = repo(TypeRepository::class)->findOrCreateManyByName($types);
        $symptomList = repo(SymptomRepository::class)->findOrCreateManyByName($symptoms);
        $triggerList = repo(TriggerRepository::class)->findOrCreateManyByName($triggers);

        $episode = new Episode();
        $episode->setNote(param()->get('note'));
        $episode->setDuration(param()->get('duration'));

        foreach ($typeList as $type) {
            $episode->addType($type);
        }

        foreach ($symptomList as $symptom) {
            $episode->addSymptom($symptom);
        }

        foreach ($triggerList as $trigger) {
            $episode->addTrigger($trigger);
        }

        em()->save($episode);

        return redirect(route('index'));
    }

    private function normalizeCommaInput(string $input): array
    {
        return explode(',', str_replace(' ', '', $input));
    }

}