# Base image
FROM python:3.13-slim

# Maintainer
LABEL maintainer="POZOS DevOps <devops@pozos.fr>"

# Set working directory at root
WORKDIR /

# Install system dependencies required by Flask and LDAP/SSL
RUN apt update -y && apt install -y --no-install-recommends \
    python-dev-is-python3 \
    python3-dev \
    build-essential \
    libc-dev \
    libsasl2-dev \
    libldap2-dev \
    libssl-dev \
    && rm -rf /var/lib/apt/lists/*

# Copy requirements file
COPY requirements.txt /requirements.txt

# Install Python dependencies
RUN pip3 install --no-cache-dir -r /requirements.txt

# Copy API source code to root "/"
COPY . /

# Create persistent data folder
RUN mkdir /data

# Declare volume for persistent data
VOLUME ["/data"]

# Expose API port
EXPOSE 5000

# Run API when container starts
CMD ["python3", "./student_age.py"]
