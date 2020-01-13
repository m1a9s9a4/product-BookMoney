<?php
namespace App\Repositories\Api;

class Book
{
    protected $title;
    protected $publisher;
    protected $authors = [];
    protected $url;
    protected $image_url;
    protected $price;
    protected $code;

    public function __construct(
        string $title,
        string $publisher,
        array $authors,
        string $url,
        string $image_url,
        int $price,
        string $code
    )
    {
        $this->title = $title;
        $this->publisher = $publisher;
        $this->authors = $authors;
        $this->url = $url;
        $this->image_url = $image_url;
        $this->price = $price;
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @return string
     */
    public function getAuthorsAsString(): string
    {
        return implode(',', $this->getAuthors());
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getPublisher(): string
    {
        return $this->publisher;
    }
}
