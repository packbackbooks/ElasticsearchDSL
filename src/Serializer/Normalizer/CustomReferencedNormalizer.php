<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizableInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectToPopulateTrait;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 * Normalizer used with referenced normalized objects.
 */
class CustomReferencedNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    use ObjectToPopulateTrait;
    use SerializerAwareTrait;

    /**
     * @var array
     */
    private $references = [];

    public function getSupportedTypes(?string $format): array
    {
        return [
            NormalizableInterface::class => true,
            DenormalizableInterface::class => true,
        ];
    }


    public function normalize($object, string $format = null, array $context = []): array
    {
        $object->setReferences($this->references);
        $data = $object->normalize($object, $format, $context);
        $this->references = array_merge($this->references, $object->getReferences());

        return $data;
    }


    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
    {
        $object = $this->extractObjectToPopulate($type, $context) ?? new $type();
        $object->denormalize($this->serializer, $data, $format, $context);

        return $object;
    }

    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof AbstractNormalizable;
    }

    /**
     * Checks if the given class implements the DenormalizableInterface.
     *
     * @param mixed       $data   Data to denormalize from
     * @param string      $type   The class to which the data should be denormalized
     * @param string|null $format The format being deserialized from
     */
    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return is_subclass_of($type, DenormalizableInterface::class);
    }
}
