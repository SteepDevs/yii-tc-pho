<?php

namespace yii_tc_pho\Expectation\Matcher;

class ExceptionMatcher extends AbstractMatcher implements MatcherInterface
{
    private $expected;

    private $thrown;

    /**
     * Creates a new ExceptionMatcher.
     *
     * @param string $expected The expected exception class
     */
    public function __construct($expected)
    {
        $this->expected = $expected;
    }

    /**
     * Compares the exception thrown by the callable, if any, to the expected
     * exception. Returns true if an exception of the expected class is thrown,
     * false otherwise.
     *
     * @param  callable $callable The function to invoke
     * @return boolean  Whether or not the function threw the expected exception
     */
    public function match($callable)
    {
        try {
            $callable();
        } catch(\Exception $exception) {
            $this->thrown = $exception;
        }

        return ($this->thrown instanceof $this->expected);
    }

    /**
     * Returns an error message indicating why the match failed, and the
     * negation of the message if $negated is true.
     *
     * @param  boolean $negated Whether or not to print the negated message
     * @return string  The error message
     */
    public function getFailureMessage($negated = false)
    {
        $explanation = 'none thrown';
        if ($this->thrown) {
            $class = get_class($this->thrown);
            $explanation = "got $class";
        }

        if (!$negated) {
            return "Expected {$this->expected} to be thrown, {$explanation}";
        } else {
            return "Expected {$this->expected} not to be thrown";
        }
    }
}
