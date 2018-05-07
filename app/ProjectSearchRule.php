<?php

namespace App;

use ScoutElastic\SearchRule;

class ProjectSearchRule extends SearchRule
{

    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        //
    }

    /**
     * @inheritdoc
     */
    public function buildQueryPayload()
    {
        $query = $this->builder->query;
        return [
            'should' => [
                [
                    'match' => [
                        'title' => [
                            'query' => $query,
                            'boost' => 3
                        ]
                    ]
                ],
                [
                    'match' => [
                        'user_username' => [
                            'query' => $query,
                            'boost' => 2
                        ]
                    ]
                ],
                [
                    'match' => [
                        'tag_names' => [
                            'query' => $query,
                            'boost' => 1
                        ]
                    ]
                ],
                [
                    'match' => [
                        'tool_names' => [
                            'query' => $query,
                            'boost' => 1
                        ]
                    ]
                ],
                [
                    'match' => [
                        'category_name' => [
                            'query' => $query,
                            'boost' => 2
                        ]
                    ]
                ],
                [
                    'match' => [
                        'comment_contents' => [
                            'query' => $query,
                            'boost' => 1
                        ]
                    ]
                ],
                [
                    'match' => [
                        'content' => [
                            'query' => $query,
                            'boost' => 2
                        ]
                    ]
                ]
            ]
        ];
    }
}