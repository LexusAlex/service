FROM node:18

RUN useradd -m alex && usermod -a -G node alex

RUN npm install -g npm@9.7.*

WORKDIR /service/nextjs

USER node