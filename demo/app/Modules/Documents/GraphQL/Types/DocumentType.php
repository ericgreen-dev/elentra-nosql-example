<?php

namespace App\GraphQL\Types;

use App\Models\Document;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class DocumentType extends GraphQLType {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'model'       => Document::class,
        'name'        => 'Document',
        'description' => 'A document'
    ];

    /**
     * Get the graphql field schema
     * 
     * @return array
     */
    public function fields() {
      return [
        'id' => [
          'type'        => Type::nonNull(Type::string()),
          'description' => 'The id of the document',
          'alias'       => '_id', // Use 'alias', if the database column is different from the type name
        ],
        'title' => [
          'type'        => Type::string(),
          'description' => 'The title of the document',
        ],
        'version' => [
            'type'        => Type::string(),
            'description' => 'The document version',
        ]
      ];
    }

  }
