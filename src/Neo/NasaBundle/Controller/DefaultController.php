<?php

namespace Neo\NasaBundle\Controller;

use Neo\NasaBundle\Document\Neo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class DefaultController
 * @package Neo\NasaBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="nasahomepage")
     */
    public function indexAction(Request $request)
    {
        try {

            return new JsonResponse([
                'hello' => "world!"
            ]);

        } catch (\Exception $exception) {

            return new JsonResponse([
                'success' => false,
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
            ]);

        }
    }


    /**
     * @Route("/getneo", name="getneodata")
     * @return mixed
     */
    public function getneoAction(Request $request)
    {
        try {
            $apiKey = 'N7LkblDsc5aen05FJqBQ8wU4qSdmsftwJagVK7UD';
            $method = 'GET';
            $data = null;
            $startDate = date("Y-m-d", strtotime('-3 days'));
            $endDate = date("Y-m-d");

            $url = 'https://api.nasa.gov/neo/rest/v1/feed?start_date='.$startDate.'&end_date='.$endDate.'&detailed=false&api_key=' . $apiKey;

            $curl = curl_init();

            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);

                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_PUT, 1);
                    break;
                default:
                    if ($data)
                        $url = sprintf("%s?%s", $url, http_build_query($data));
            }

            // Optional Authentication:
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $result = json_decode(curl_exec($curl));

            curl_close($curl);

            // save the data into mongodb
            foreach ($result->near_earth_objects as $date => $objects) {

                foreach ($objects as $object) {
                    $data = array(
                        'date' => $date,
                        'reference' => $object->neo_reference_id,
                        'name' => $object->name,
                        'speed' => $object->close_approach_data[0]->relative_velocity->kilometers_per_hour,
                        'hazardous' => $object->is_potentially_hazardous_asteroid
                    );
                    $this->saveNeoData($data);
                }

            }

            return new JsonResponse([
                'count' => $result->element_count
            ]);

        } catch (\Exception $exception) {

            return new JsonResponse([
                'success' => false,
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
            ]);

        }
    }

    /**
     * @param $data
     * @return Response
     */
    private function saveNeoData($data)
    {
        $neo = new Neo();
        $neo->setDate($data['date']);
        $neo->setName($data['name']);
        $neo->setReference($data['reference']);
        $neo->setSpeed($data['speed']);
        $neo->setHazardous($data['hazardous']);
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($neo);
        $dm->flush();

        return new Response('Created product id '.$neo->getId());
        
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function hazardousAction(Request $request)
    {
        try {
            $repository = $this->get('doctrine_mongodb')
                ->getManager()
                ->getRepository('NasaBundle:Neo');

            $neoObjects = $repository->findByHazardous(true);
            $jsonResult =  array();

            if(count($neoObjects) > 0) {

                foreach ($neoObjects as $object) {
                    $jsonResult[] = $object->toArray();
                }

                return new JsonResponse([
                    'success' => true,
                    'hazardous' => $jsonResult
                ]);

            } else {

                throw $this->createNotFoundException('No hazardous neo object found');
            }



        } catch (\Exception $exception) {

            return new JsonResponse([
                'success' => false,
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
            ]);

        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function fastestAction(Request $request)
    {
        try {
            $repository = $this->get('doctrine_mongodb')
                ->getManager()
                ->getRepository('NasaBundle:Neo');

            $neoObjects = $repository->findBy(
                array(),
                array('speed' => 'DESC')
            );
            //echo "<pre>"; print_r($neoObjects[0]); exit;
            $jsonResult =  null;

            if(count($neoObjects) > 0) {
                $jsonResult = $neoObjects[0]->toArray();

                return new JsonResponse([
                    'success' => true,
                    'hazardous' => $jsonResult
                ]);

            } else {

                throw $this->createNotFoundException('No hazardous neo object found');
            }



        } catch (\Exception $exception) {

            return new JsonResponse([
                'success' => false,
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
            ]);

        }
    }

}