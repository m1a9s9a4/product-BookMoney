<?php
namespace App\Services\Models;

class Book
{
    protected $title;

    protected $authors;

    protected $price;

    protected $code;

    protected $url;

    protected $image_url;

    protected $publisher;

    protected $client;

    public function __construct(
        string $title,
        array $authors,
        int $price,
        string $code,
        string $url,
        string $image_url,
        string $publisher,
        string $client
    )
    {
        $this->title = $title;
        $this->authors = $authors;
        $this->price = $price;
        $this->code = $code;
        $this->url = $url;
        $this->image_url = $image_url;
        $this->publisher = $publisher;
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    public function getAuthorAsString()
    {
        return implode(',', $this->getAuthors());
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @return string
     */
    public function getPublisher(): string
    {
        return $this->publisher;
    }

    /**
     * @return string
     */
    public function getClient(): string
    {
        return $this->client;
    }
}
