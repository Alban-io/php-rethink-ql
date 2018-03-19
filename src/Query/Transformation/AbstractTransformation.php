<?php
declare(strict_types = 1);

namespace TBolier\RethinkQL\Query\Transformation;

use TBolier\RethinkQL\Query\AbstractQuery;
use TBolier\RethinkQL\Query\QueryInterface;

abstract class AbstractTransformation extends AbstractQuery implements TransformationInterface
{
    /**
     * @inheritdoc
     */
    public function isEmpty(): QueryInterface
    {
        return new IsEmpty($this->rethink, $this->message, $this);
    }

    /**
     * @inheritdoc
     */
    public function limit($value): TransformationCompoundInterface
    {
        return new Limit($this->rethink, $this->message, $this, $value);
    }

    /**
     * @inheritdoc
     */
    public function skip($value): TransformationCompoundInterface
    {
        return new Skip($this->rethink, $this->message, $this, $value);
    }

    /**
     * @inheritdoc
     */
    public function orderBy($key): TransformationCompoundInterface
    {
        return new OrderBy($this->rethink, $this->message, $this, $key);
    }
}