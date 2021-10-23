import os
import csv
import sys
import mysql.connector
import getpass
import string
def main():
    passwd = getpass.getpass("MySQL password> ")
    os.system("/usr/local/mysql/bin/mysql -u root -p" + passwd + " -v < VainSchemaNewRevised.sql")
    mydb = mysql.connector.connect(
            host="localhost",
            user="root",
            password=passwd,
            database="vain"
            )

    mycursor = mydb.cursor()

    if len(sys.argv) > 2 :
        print("Only one argument is allowed.")
        sys.exit()
    elif len(sys.argv) == 1 :
        print("Please input the TSV as an argument.")
        sys.exit()
    if not str(sys.argv[1]).endswith('.tsv'):
        print("Not a TSV file.  Please pass a tsv file as the argument")
        sys.exit()
    else:
        csv_file = str(sys.argv[1])
        with open(csv_file, "r", encoding = "ISO-8859-1") as f:
            csvreader = csv.reader(f, delimiter="\t")
            sql_meta = "INSERT INTO book(book_id, title, description, genre_id, author_id, publisher_id, library_id) VALUES (%s, %s, %s, %s, %s, %s, %s)"
            sql_author = "INSERT INTO author(author_id, name) VALUES (%s, %s)"
            sql_genre = "INSERT INTO genres(genre_id, genre_type) VALUES (%s, %s)"
            sql_library = "INSERT INTO library(library_id, name, country, state, street, zip, owner, url) VALUES(%s, %s, %s, %s, %s, %s, %s, %s)"
            sql_publisher = "INSERT INTO publisher(publisher_id, publisher_name, location, notes) VALUES (%s, %s, %s, %s)"
            count = 0
            for x in csvreader:
                if count == 0:
                    print("Skipping headers...")
                else:
                    print("===========")
                    print(x)
                    newthing = []
                    for y in x:
                        y = ''.join(filter(lambda p: p in string.printable, y))
                        newthing.append(str(y))
                    x = newthing
                    print("---")
                    print(x)
                    print("===========")

                    values = (count, x[8], x[-1], x[-2])
                    print(sql_publisher.split("VALUES")[0] + "VALUES {}".format(values))
                    mycursor.execute(sql_publisher, values);
                    values = (count, x[-1], '', '', '', 0, '', '')
                    print(sql_library.split("VALUES")[0] + "VALUES {}".format(values))
                    mycursor.execute(sql_library, values)
                    values = (count, x[1])
                    print(sql_genre.split("VALUES")[0] + "VALUES {}".format(values))
                    mycursor.execute(sql_genre, values)
                    values = (count, x[4])
                    print(sql_author.split("VALUES")[0] + "VALUES {}".format(values))
                    mycursor.execute(sql_author, values)
                    values = (count, x[5], x[8], count, count, count, count)
                    print(sql_meta.split("VALUES")[0] + "VALUES {}".format(values))
                    mycursor.execute(sql_meta, values)
                    mydb.commit();


                count += 1
main()
