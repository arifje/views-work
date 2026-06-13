<?php

namespace twentyfourhoursmedia\viewswork\gql\types;

use craft\gql\base\ObjectType;
use craft\gql\GqlEntityRegistry;
use GraphQL\Type\Definition\Type;

class ViewRecordingType extends ObjectType
{
    public static function getName(): string
    {
        return 'ViewsWorkViewRecording';
    }

    public static function getType(): self
    {
        return GqlEntityRegistry::getOrCreate(
            self::getName(),
            fn() => new self([
                'name' => self::getName(),
                'description' => 'Views Work recording counters for an element.',
                'fields' => [
                    'total' => [
                        'name' => 'total',
                        'type' => Type::nonNull(Type::int()),
                        'description' => 'Total views.',
                    ],
                    'thisMonth' => [
                        'name' => 'thisMonth',
                        'type' => Type::nonNull(Type::int()),
                        'description' => 'Views for the current month.',
                    ],
                    'thisWeek' => [
                        'name' => 'thisWeek',
                        'type' => Type::nonNull(Type::int()),
                        'description' => 'Views for the current week.',
                    ],
                    'today' => [
                        'name' => 'today',
                        'type' => Type::nonNull(Type::int()),
                        'description' => 'Views for today.',
                    ],
                ],
            ])
        );
    }
}
