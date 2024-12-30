FROM node:latest 

WORKDIR /usr/src/app


COPY ../app/package.json ../app/package-lock.json ./


COPY ../app/ ./

RUN npm install

CMD ["npm", "run", "dev"]