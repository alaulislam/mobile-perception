library(plyr)
library(dplyr)
library(MPDiR)
library(quickpsy)
library(fitdistrplus)
library(ggplot2)

# Global values for our conditions
tasks <- c('T1','T2','T3')
sizes <- c('s1','s2','s3')

# set directory where script is
sourceDir <- dirname (rstudioapi::getActiveDocumentContext()$path) 
defaultpath <- sourceDir

#remove(list = ls())
print(defaultpath)
setwd(defaultpath)

# get all log files
setwd("exp-data")
file_list <- list.files()
show(file_list)

if (exists ("allData")) { rm(allData) }

##we do the analysis once per task
for (task in tasks){

  # basic loop that reads over participant files
  # and computes normalized errors
  print("Working on Task: ")
  print(task)
  print("-----------------------------------------")
  
  allData <- NULL
  for (file in file_list){
  
    if(!grepl(task,file) | grepl("confidence",file) ){
      #if the filename doesn't contain the current task short code or the word "confidence_survey" then don't take it
      print("Skipping file")
      print(file)
      next
    }
    
    print("Analyzing file")
    print(file)
    setwd("~/Desktop/OnlineExperiment/AnalysisScripts/exp-data/")
    # dataFile <- read.csv(file)
    dataFile <- (read.csv(file,header=T,sep=",")[-16,])
    # class(dataFile)
    # print(dataFile)
    # mydf <- read.table(dataFile)[-c(16), ]
    # collect all trials in order to calculate error rate, keep non training trials (trial > 0)
    tmp <- dataFile
    # no training
    tmp <- tmp [which(!grepl("practice",tmp$page_name,fixed=TRUE)),]
    
    #convert the error, correct values
    tmp$answer_numeric <- 0
    #this way later we will calculate percept correct. If we want "percent wrong" switch the 0 and 1
    tmp$answer_numeric[grep("correct",tmp$answer)] <- 1
    
    
    #combine all files in one big one
    if ( !exists("allData") ){
      allData <- tmp
    } else {
      allData <- rbind(allData,tmp)
      }
  }
  
  print(defaultpath)
  setwd(defaultpath)
  write.csv(allData, file=paste("~/Desktop/OnlineExperiment/AnalysisScripts/results/all_data-",task,".csv",sep=""))

}





