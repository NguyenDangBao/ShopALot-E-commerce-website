# ShopALot: AI-Enhanced E-Commerce Platform


## 📌 Overview

ShopALot is a modern, feature-rich e-commerce platform that leverages artificial intelligence to enhance the shopping experience. Developed by Nguyen Dang Bao, this project combines traditional e-commerce functionality with cutting-edge AI features to create a seamless, personalized shopping journey.

## 🚀 Key Features

### AI-Powered Capabilities

- **Intelligent Chatbot**: Real-time customer support through an AI-powered chatbot that can answer product questions, help with navigation, and provide purchase assistance
- **Smart Product Recommendations**: AI-driven recommendation engine that suggests products based on browsing history, purchase patterns, and user preferences
- **User-Specific Experience**: Personalized shopping experience with content tailored to individual users and persistent across sessions

### Core E-Commerce Functionality

- **Comprehensive Product Catalog**: Organized by categories with detailed product pages
- **Shopping Cart System**: Intuitive cart management with real-time updates
- **User Account Management**: Registration, login, profile management
- **Order Tracking**: Complete order history and status monitoring
- **Multi-payment Gateway Integration**: Support for various payment methods including:
  - Credit/Debit Cards
  - VNPay (Vietnam Payment Solution)
  - Cash on Delivery (COD)

### Administration System

- **Dashboard Overview**: At-a-glance business metrics and performance indicators
- **Product Management**: Add, edit, and remove products with attribute management
- **Order Processing**: Review, update status, and manage fulfillment
- **User Management**: Monitor user accounts and activity
- **Content Management**: Blog posts, banners, and promotional content
- **Analytics & Reports**: Sales reports, user behavior analysis, and performance tracking

## 🔧 Technical Architecture

ShopALot is built using a modern tech stack:

- **Frontend**: HTML5, CSS3, JavaScript, jQuery, Bootstrap
- **Backend**: PHP Laravel Framework
- **Database**: MySQL
- **AI Components**:
  - Python Flask API for chatbot functionality
  - Machine learning models for recommendation system
- **Payment Integration**: RESTful API connections to payment gateways
- **Security**: CSRF protection, data encryption, secure authentication

## 🚦 Getting Started

### Prerequisites

- PHP 7.4 or higher
- Composer
- Node.js and npm
- MySQL
- Python 3.8+ (for AI components)

### Installation

1. Clone the repository
   ```bash
   git clone https://github.com/yourusername/shopalot.git
   cd shopalot
   ```

2. Install PHP dependencies
   ```bash
   composer install
   ```

3. Install JavaScript dependencies
   ```bash
   npm install
   ```

4. Create environment file
   ```bash
   cp .env.example .env
   ```

5. Generate application key
   ```bash
   php artisan key:generate
   ```

6. Configure database connection in `.env`
   ```
   DB_CONNECTION=
   DB_HOST=
   DB_PORT=
   DB_DATABASE=shopalot
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Run migrations and seed the database
   ```bash
   php artisan migrate --seed
   ```

8. Install Python dependencies (for AI components)
   ```bash
   cd python-api
   pip install -r requirements.txt
   ```

9. Start the Laravel development server
   ```bash
   php artisan serve
   ```

10. Start the Python Flask API (in a separate terminal)
    ```bash
    cd python-api
    python app.py
    ```

### Admin Access

- Admin Dashboard: `http://localhost:8000/admin`
- Default Credentials:
  - Email: admin@gmail.com
  - Password: 123456

## 🔍 Future Developments

- Mobile application with integrated AI features
- Advanced analytics dashboard
- Voice search functionality
- AR product visualization
- Enhanced personalization using deep learning
- Multi-language support

## 👨‍💻 Author

**Nguyen Dang Bao**
- GitHub: [github.com/NguyenDangBao](https://github.com/NguyenDangBao)
- Email: brendanbao12@gmail.com

## extra feature

Chatbots: https://github.com/NguyenDangBao/Chatbox

---

<div align="center">
  © 2025 ShopALot. All Rights Reserved.
</div>
