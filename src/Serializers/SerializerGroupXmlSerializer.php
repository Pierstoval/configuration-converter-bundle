<?php

declare(strict_types=1);

namespace ConfigurationConverter\Serializers;

use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerGroupXmlSerializer implements ConfigurationSerializerInterface
{
    public function serialize(array $data): string
    {
        $serializer = new Serializer([new ObjectNormalizer()], [new XmlEncoder()]);

        return  (string) $serializer->encode(
            [
                '@xmlns' => 'http://symfony.com/schema/dic/serializer-mapping',
                '@xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
                '@xsi:schemaLocation' => 'http://symfony.com/schema/dic/serializer-mapping https://symfony.com/schema/dic/serializer-mapping/serializer-mapping-1.0.xsd',
                'class' => $data,
            ],
            'xml',
            [
                XmlEncoder::ROOT_NODE_NAME => 'serializer',
                XmlEncoder::REMOVE_EMPTY_TAGS => true,
                XmlEncoder::AS_COLLECTION => true,
                XmlEncoder::FORMAT_OUTPUT => true,
            ]
        );
    }
}
