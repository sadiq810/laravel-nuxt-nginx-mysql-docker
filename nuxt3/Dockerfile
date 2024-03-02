FROM node:20-alpine

WORKDIR /app

RUN apk update && apk upgrade
RUN apk add git

COPY ./package*.json /app/

RUN npm install && npm cache clean --force

COPY . .

ENV PATH ./node_modules/.bin/:$PATH
ENV NUXT_HOST=0.0.0.0
ENV NUXT_PORT=3000
ENV API_URL=http://localhost:8080/api
ENV API_SSR_URL=http://laravel_nginx:8080/api
