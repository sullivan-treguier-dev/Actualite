<?php
class Collection implements IteratorAggregate {
    private array $items;

    public function __construct(array $items) {
        $this->items = $items;
    }

    public function getIterator(): ArrayIterator {
        return new ArrayIterator($this->items);
    }

    public function first(): static {
        return new static($this->items[0] ?? null);
    }

    public function find(int $id): static|null {
        foreach ($this->items as $item) {
            if (isset($item->id) && $item->id === $id) {
                return new static(array($item));
            }
        }
        return null;
    }

    public function distinct(): static {
        return new static(array_values(array_unique($this->items)));
    }

    public function toArray(): array {
        return $this->items;
    }

    public function count(): int {
        return count($this->items);
    }

    public function limit(int $limit): static {
        $limit_table = [];
        if (count($this->items) >= $limit) {
            for ($i = 0; $i <= 3; $i++) {
                $limit_table[] = $this->items[$i];
            }
            return new static(array_values($limit_table));
        } else {
            return new static(array_values($this->items));
        }
    }

    public function pluck(string $attribute): static {
        $resultat = array_map(fn($item) => $item->$attribute, $this->items);
        return new static($resultat);
    }
}