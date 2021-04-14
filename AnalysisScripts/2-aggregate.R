library(plyr)
library(dplyr)
library(MPDiR)
library(quickpsy)
library(fitdistrplus)
library(ggplot2)

source("~/Desktop/OnlineExperiment/AnalysisScripts/1-read-files.R") # to read global values


# set directory where script is
# sourceDir <- dirname (rstudioapi::getActiveDocumentContext()$path) 
# defaultpath <- sourceDir

#remove(list = ls())
# print(defaultpath)
# setwd(defaultpath)
setwd("~/Desktop/OnlineExperiment/AnalysisScripts/")
for (task in tasks){
  
  filename <- paste("results/all_data-",task,".csv",sep="")
  dataFile <- read.csv(filename)
  
  #aggregating the data per visualization size and participant
  aggregatedstable <- ddply(dataFile,
                            c("participant_id"," visualization_size"), 
                            summarise,
                            mean_correct=mean(answer_numeric),
                            mean_time_taken=mean(answering_time)
                            #mean_time_taken=mean(answering_time/1000) #for seconds
  )
  
  write.csv(aggregatedstable, file=paste("~/Desktop/OnlineExperiment/AnalysisScripts/results/aggregated-",task,".csv",sep=""))
  
  ##################################################################
  
}