# Use a base PHP image
FROM php:latest

# Copy the application code to the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install any dependencies
RUN apt-get update && \
    apt-get install -y \
    # Packages needed for your application

# Expose the necessary port
EXPOSE 80

# Define the command to start the PHP server
CMD ["php", "-S", "0.0.0.0:80"]
