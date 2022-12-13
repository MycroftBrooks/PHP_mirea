from django.db import models

class product(models.Model):
    name = models.CharField(max_length=100)
    price = models.IntegerField()
    def __str__(self):
        return self.name + " " + str(self.price)

class vacancy(models.Model):
    name = models.CharField(max_length=100)
    salary = models.IntegerField()
    def __str__(self):
        return self.name + " " + str(self.salary)

class pdfloader(models.Model):
    title = models.CharField(max_length=100)
    pdf = models.FileField(upload_to='pdfs/')
    
