<?php
class Message {
    public int $id;
    public string $message;
    public string $user_fk;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getUserFk(): string
    {
        return $this->user_fk;
    }

    /**
     * @param string $user_fk
     */
    public function setUserFk(string $user_fk): void
    {
        $this->user_fk = $user_fk;
    }

}