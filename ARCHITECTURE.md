# Application Architecture

## MVC responsibilities

- Controllers validate requests and coordinate each workflow.
- Models read and write one database table each.
- Views display forms, lists, messages, and joined sales data.
- `AuthFilter` blocks every management route unless a staff session exists.

## Relational design

```mermaid
erDiagram
    PRODUCTS ||--o{ SALES : sold_as
    CUSTOMERS o|--o{ SALES : purchases
    USERS ||--o{ SALES : records
```

Each sale requires one product and one logged-in staff user. A customer is optional for walk-in sales.

## Sale workflow

```mermaid
flowchart TD
    A[Validate product customer and quantity] --> B[Begin database transaction]
    B --> C[Lock and read product stock]
    C --> D{Enough stock}
    D -- No --> E[Roll back and show error]
    D -- Yes --> F[Insert sale]
    F --> G[Decrease stock]
    G --> H[Commit transaction]
```

The row lock and transaction prevent the sale record and stock quantity from becoming inconsistent.
