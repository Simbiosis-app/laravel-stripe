<?php
/**
 * Copyright 2020 Cloud Creativity Limited
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace CloudCreativity\LaravelStripe\Repositories;

use CloudCreativity\LaravelStripe\Assert;
use Stripe\Customer;

class CustomerRepository extends AbstractRepository
{

    use Concerns\All;
    use Concerns\Retrieve;
    use Concerns\Update;

    /**
     * Create a customer.
     *
     * Both currency, amount and customer are required parameters.
     *
     * @param string $currency
     * @param int $amount
     * @param iterable|array $params
     *      additional optional parameters.
     * @return Customer
     */
    public function create(iterable $params = []): Customer
    {
        $this->params($params);

        return $this->send(
            'create',
            $this->params ?: null,
            $this->options ?: null
        );
    }

    /**
     * @inheritDoc
     */
    protected function fqn(): string
    {
        return Customer::class;
    }
}
