FROM wordpress 
COPY . /var/www/html
RUN apt update && apt install -y nodejs \ 
npm 
WORKDIR /var/www/html/wp-content/themes/earthbnbTheme
COPY ./wordpress/wp-content/themes/earthbnbTheme/package.json .

RUN npm install
COPY . ./node_modules
CMD [ "npm", "run", "watch"]
