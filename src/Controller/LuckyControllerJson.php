<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'All the JSON routes on this website:',
            '/api/quote',
        ];

        // return new JsonResponse($data);

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/quote")]
    public function jsonQuote(): Response
    {
        $number = random_int(0, 3);
        if ($number == 1):
            $quote = "Like all dreamers, I mistook disenchantment for truth";
        elseif ($number == 2):
            $quote = "I was made for another planet altogether - Simone de Beauvoir";
        elseif ($number == 3):
            $quote = "The man who says his wife cant take a joke, forgets that she took him - Oscar Wilde";
        else:
            $quote = "When in doubt, look intelligent";
        endif;

        $data = [
            'Quote of the day (or right now?)' => $quote,
            'Today is:' => date('l jS \of F Y'),
            'The time this was generated at:' => date("H:i:s"),
        ];

        // return new JsonResponse($data);

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
