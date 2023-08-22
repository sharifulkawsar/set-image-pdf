## Getting Started

Follow these steps to get the project up and running on your local machine.

### Prerequisites

- [PHP 8.1.6](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/download/)
- [FPDF/FPDI](https://packagist.org/packages/setasign/fpdi-fpdf)

### Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/sharifulkawsar/set-image-pdf.git
2. Composer install:
    ```sh
    composer install
3. Create a .env file:
    ```sh
    cp .env.example .env
4. Generate an application key:
    ```sh
    php artisan key:generate
6. Create a symbolic link for storage:
    ```sh
    php artisan storage:link

7. Start the development server:
    ```sh
    php artisan serve
