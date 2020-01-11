FROM node:12-slim

# Also exposing VSCode debug ports
EXPOSE 8080 22

RUN \
  apt-get update \ 
  && apt-get install --no-install-recommends -y git bash coreutils libglu1 libxi6 libgconf-2-4 \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

RUN git config --global http.sslVerify false

RUN npm install -g gatsby-cli
RUN ["gatsby", "telemetry", "--disable"]
WORKDIR /app
# RUN ["gatsby", "new", "test"]

COPY package.json .

RUN ["npm","install"]

COPY . .

HEALTHCHECK --interval=5m --timeout=10s \
  CMD curl -f http://localhost:8080/ || exit 1

CMD ["gatsby", "develop", "-H", "0.0.0.0","-p","8080"]
